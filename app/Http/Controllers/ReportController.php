<?php

namespace App\Http\Controllers;

use App\Models\Product;
use DateTime;

class ReportController extends Controller
{
    public function index()
    {
        $productsWithLittleUnits = $this->productWithQuantityLessThan100();
        $productsCreated = $this->productThatWasCreatedToday();
        $productsDeleted = $this->productThatWasDeletedToday();
        $productsAddedBySystem = $this->productTharWasAddedBy('sistema');
        $productsDeletedBySystem = $this->productTharWasRemovedBy('sistema');
        $productsAddedByAPI = $this->productTharWasAddedBy('api');
        $productsDeletedByAPI = $this->productTharWasRemovedBy('api');
        return view('report.report', [
            'productsWithLittleUnits' => $productsWithLittleUnits,
            'productsCreated' => $productsCreated,
            'productsDeleted' => $productsDeleted,
            'productsAddedBySystem' => $productsAddedBySystem,
            'productsDeletedBySystem' => $productsDeletedBySystem,
            'productsAddedByAPI' => $productsAddedByAPI,
            'productsDeletedByAPI' => $productsDeletedByAPI
        ]);
    }

    private function productWithQuantityLessThan100()
    {
        $products = Product::where('quantity', '<', 100)->get();
        return $products;
    }

    private function productThatWasCreatedToday()
    {
        $date = new DateTime();
        $todayEarly = $date->format('Y-m-d') . ' 00:00:00';
        $todayLate = $date->format('Y-m-d') . ' 23:59:59';
        $products = Product::whereBetween('created_at', [$todayEarly, $todayLate])
            ->get();
        return $products;
    }

    private function productThatWasDeletedToday()
    {
        $date = new DateTime();
        $todayEarly = $date->format('Y-m-d') . ' 00:00:00';
        $todayLate = $date->format('Y-m-d') . ' 23:59:59';
        $products = Product::whereBetween('deleted_at', [$todayEarly, $todayLate])
            ->withTrashed()
            ->get();
        return $products;
    }

    private function productTharWasAddedBy($typeAdd)
    {
        $date = new DateTime();
        $todayEarly = $date->format('Y-m-d') . ' 00:00:00';
        $todayLate = $date->format('Y-m-d') . ' 23:59:59';
        $products = Product::where('addBy', $typeAdd)
            ->whereBetween('created_at', [$todayEarly, $todayLate])
            ->get();
        return $products;
    }

    private function productTharWasRemovedBy($typeAdd)
    {
        $date = new DateTime();
        $todayEarly = $date->format('Y-m-d') . ' 00:00:00';
        $todayLate = $date->format('Y-m-d') . ' 23:59:59';
        $products = Product::where('removeBy', $typeAdd)
            ->whereBetween('deleted_at', [$todayEarly, $todayLate])
            ->withTrashed()
            ->get();
        return $products;
    }
}
