@extends('layout/main')

@section('tabel')
    <div class="container">
        <div class="content ml-10">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-default">

                        <div class="card-header card-header-border-bottom mb-8">
                            <p class="font-bold col-span-5 w-full text-center text-4xl m-auto">REVENUE REPORT</p>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('report') }}" method="get" class="mb-5">
                                
                                <div class="row">

                                    
                                    <div date-rangepicker class="flex items-center">
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                            </div>
                                            <input name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="start" placeholder="Select date start" value="{{ !empty(request()->input('start')) ? request()->input('start') : '' }}" name="start">
                                        </div>

                                        <span class="mx-4 text-gray-500">to</span>

                                        <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                        </div>
                                        <input name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="end" placeholder="Select date end" value="{{ !empty(request()->input('end')) ? request()->input('end') : '' }}">

                                    </div>
                                    </div>
  
                                    <div class="col-lg-3">
                                        <div class="form-group mx-sm-3 mb-2">
                                            <select name="export" class="form-control">
                                                <option value="pdf">-</option>
                                                <option value="pdf">pdf</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group mx-sm-3 mb-2 w-64">
                                            <button type="submit" class="btn btn-primary btn-defaultblock w-full select-none rounded-lg bg-blue-500 py-2 mt-1  text-white shadow-md hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">GO <br>(Download Report)</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                        <div class="table-responsive mb-10">
                            <table class="table border border-black">
                                
                                    <thead>
                                        <th class="px-4 py-2">No</th>
                                        <th class="px-4 py-2">Date</th>
                                        <th class="px-4 py-2">Total Revenue</th>
                                    </thead>

                                    <tbody>

                                        @forelse ($reports as $report)
                                            <tr>    
                                                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                                <td class="border px-4 py-2">{{ $report['date'] }}</td>
                                                <td class="border px-4 py-2">Rp. {{ number_format($report['revenue']) }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6">No records found</td>
                                            </tr>
                                        @endforelse

                                        @if ($reports)
                                            <tr>
                                                <td class="border px-4 py-2">Total</td>
                                                <td class="border px-4 py-2"></td>
                                                <td class="border px-4 py-2"><strong>Rp. {{ number_format($total_revenue,2) }}</strong></td>
                                            </tr>
                                        @endif
                                    </tbody>

                            </table>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script-alt')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/datepicker.min.js"></script>

    @endpush
@endsection