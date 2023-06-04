<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Exports\RevenueExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function report(Request $request)
	{
		
		$startDate = $request->input('start');
        $endDate = $request->input('end');

		if ($startDate && !$endDate) {
			return redirect('pegawai.report');
		}

		if (!$startDate && $endDate) {
			return redirect('pegawai.report');
		}

		if ($startDate && $endDate) {
			if (strtotime($endDate) < strtotime($startDate)) {
				return redirect('pegawai.report');
			}

			$earlier = new \DateTime($startDate);
			$later = new \DateTime($endDate);
			$diff = $later->diff($earlier)->format("%a");
			
			if ($diff >= 31) {
				return redirect('pegawai.report');
			}
		} else {
			$currentDate = date('Y-m-d');
			$startDate = date('Y-m-01', strtotime($currentDate));
			$endDate = date('Y-m-t', strtotime($currentDate));
		}
		$startDate = $startDate;
        $endDate = $endDate;

        $reports = [];
        $revenue = 0;
        $total_revenue = 0;

        while (strtotime($startDate) <= strtotime($endDate)) {
            $date = $startDate;
            $startDate = date('Y-m-d', strtotime("+1 day", strtotime($startDate)));

            $revenue = Transaksi::where('created_at', 'LIKE', "%$date%")->sum('total'); 

            $total_revenue += $revenue;

            $row = [];
            $row['date'] = $date;
            $row['revenue'] = $revenue;
            $reports[] = $row;
		}
		
		if ($exportAs = $request->input('export')) {
			if (!in_array($exportAs, ['xlsx', 'pdf'])) {
				return redirect()->route('pegawai.report');
			}

			if ($exportAs == 'pdf') {
				$fileName = 'report-revenue-'. $endDate .'-'. $startDate .'.pdf';
				$pdf = PDF::loadView('exports.revenue-pdf', compact('reports','total_revenue','startDate','endDate'));

				return $pdf->download($fileName);
			}
        }

        // dd($reports);

		return view('pegawai.report', compact('reports','total_revenue','startDate','endDate'));
	}
}
