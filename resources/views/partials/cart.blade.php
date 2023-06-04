<div class="flex items-start max-w-7xl mx-auto mt-7 ml-5 p-4 border rounded-md font-outfit bg-slate-100 ">        
    
    <section class="bg-white w-1/3 rounded-lg p-4 fixed right-0 top-0 h-screen scale overflow-y-auto">
        <div class="grid grid-cols-6 gap-4 -mb-8 relative mt-4">
            
            <p class="font-bold col-span-5 w-full text-center m-auto">Keranjang Pesanan</p>
            <div class="w-11 h-11 rounded-full bg-cover" > </div>

        </div>

        <div class="h-1 bg-blue-500 mt-8"></div>

        <hr>

        <div id="side-cart">
            <table id="cart">
                <thead>
                    <tr>
                        <th style="width:20%">Menu</th>
                        <th style="width:10%">Harga</th>
                        <th style="width:8%">Qty</th>
                        <th style="width:10%">Subtotal</th>
                    </tr>
                </thead>

                <tbody>

                    @php 
                    $total = 0;
                    $totalMakanan = 0;
                    $totalMinuman = 0;
                    
                    $kembalian = 0;
                    @endphp

                    @if(session('cartMakanan'))
                        @foreach(session('cartMakanan') as $id => $details)
                        @php 
                            $totalMakanan += $details['harga_makanan'] * $details['quantity'] 
                        @endphp 

                        <tr data-id="{{ $id }}">

                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <h4 class="nomargin">{{ $details['nama_makanan'] }}</h4>
                                    </div>
                                </div>
                            </td>

                            <td data-th="harga_makanan">Rp.{{ $details['harga_makanan'] }}</td>

                            <td data-th="Quantity">
                                <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity cart_update" data-id="{{ $id }}" min="1" />
                            </td>

                            <td data-th="Subtotal" class="text-center subtotal" data-id="{{ $id }}">
                                Rp.{{ $details['harga_makanan'] * $details['quantity'] }}
                            </td>

                            <td class="actions" data-th="">
                                <form action="{{ route('cart_remove', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm cart_remove" value="delete"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>

                        </tr>

                    @endforeach
                    @endif

                    @if(session('cartMinuman'))
                        @foreach(session('cartMinuman') as $id => $details)
                        @php $totalMakanan += $details['harga_minuman'] * $details['quantity'] @endphp 
                            <tr data-id="{{ $id }}">
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <h4 class="nomargin">{{ $details['nama_minuman'] }}</h4>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="harga_minuman">Rp.{{ $details['harga_minuman'] }}</td>
                                
                                
                                <td data-th="Quantity">
                                    <input type="number" value="{{ $details['quantity'] }}" class=" quantity cart_update" data-id="{{ $id }}" min="1" />
                                </td>


                                <td data-th="Subtotal" class="text-center subtotal" data-id="{{ $id }}">Rp.{{ $details['harga_minuman'] * $details['quantity'] }}
                                </td>

                                <td class="actions" data-th="">
                                    <form action="{{ route('cart_remove_minuman', $id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm cart_remove" value="delete"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            
                        @endforeach
                    @endif
                    
                    
                    
                    @php 
                        $total = $totalMakanan + $totalMinuman;
                    @endphp 
                </tbody>
            </table>
        
            
            <div class="h-1 bg-blue-500 mt-5"></div>
            <div>
                <ul  class="">
                    
                    
                    <li class="flex justify-between px-4 py-2">
                    <span class="font-bold ">TOTAL</span>
                    <span class="font-bold text-blue-700  ">Rp. {{ $total}}</span>
                    </li>

                    
                    <div class="row mt-2">
                        <div class="col">Diterima:</div>
                        <div class="col text-right">
                            <input type="number" value="" name="accept" class="form-control received">
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col">Kembalian:</div>
                        <div class="col text-right"> 
                            <input type="number" value="" name="return" readonly class="form-control return">
                        </div>
                    </div>


                </ul>
            </div>

            <div class="p-6 pt-3 mt-0">
                <form method="POST" action="{{ route('proses_pembayaran') }}">
                    @csrf
                    <input type="hidden" name="total" value="{{ $total }}">
                    <button type="submit" class="block w-full select-none rounded-lg bg-blue-500 py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">Bayar</button>
                </form>
            </div>
            
    </section>

    <script>
        $(".cart_update").change(function (e) {
            e.preventDefault();
    
            var ele = $(this);
    
            $.ajax({
                url: '{{ route('update_cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id"), 
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function (response) {
                window.location.reload();
                }
            });
        });    
    </script>

    <script>
        $(".cart_update").change(function (e) {
            e.preventDefault();
    
            var ele = $(this);
    
            $.ajax({
                url: '{{ route('update_minuman') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id"), 
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function (response) {
                window.location.reload();
                }
            });
        });     

        
    </script>     
    
    <script>
        $(document).on('change', '.received', function() {
            const received = $(this).val();
            const total = ' {{ $total }}';
            const subTotal = received - total;
            const change = $('.return').val(subTotal);            
        })
    </script>

    

</div>
