<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CostumerController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LeavingItemController;
use App\Http\Controllers\ReceivedItemController;

use App\Http\Controllers\SupplierController;
use App\Models\Costumer;
use App\Models\LeavingItem;
use App\Models\Item;

use App\Models\ReceivedItem;
use App\Models\Supplier;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {


    $items = Item::with('stokMasuk')->get();
    
    $data = [];
    $labelPersen = [];
    $label = [];

    $show = false;
    $totalSemuaItem = 0;

    $totalJumlahNilai = 0;
    for($i = 0; $i < count($items); $i++){
        $show = true;
        $data[$i]['nama_barang'] = $items[$i]['nama_barang'];
        $data[$i]['harga_beli'] = $items[$i]['harga_beli'];

        $length = count($items[$i]->stokMasuk);
        $totalJumlahPeritem = 0;

        for($j = 0; $j < $length; $j++) {
            $totalJumlahPeritem += $items[$i]->stokMasuk[$j]['jumlah'];
        }
        
        $data[$i]['total_jumlah'] = $totalJumlahPeritem;
        $totalSemuaItem += $totalJumlahPeritem;
        $data[$i]['nilai'] = $totalJumlahPeritem * $items[$i]['harga_beli'];
        $totalJumlahNilai += $data[$i]['nilai'];
    }

    for ($i = 0; $i < count($data); $i++) {
        $data[$i]['persenan'] = $data[$i]['nilai'] / $totalJumlahNilai;
    }

    // Sorting : 
    for ($i = 0; $i < count($data); $i++) {
        for ($j = 0; $j < (count($data) - 1); $j++) {
            if ($data[$j]['nilai'] < $data[$j + 1]['nilai']) {
                $swap = $data[$j];
                $data[$j] = $data[$j + 1];
                $data[$j + 1] = $swap;
            }
        }
    }

    // Categories : 
    $persenan = 0;
    for ($i = 0; $i < count($data); $i++) {
        $persenan += $data[$i]['persenan'];
        $data[$i]['total_persen'] = $persenan;

        $labelPersen[] = $data[$i]['persenan'];
        $label[] = $data[$i]['nama_barang'];

        // if ($persenan <= 70/100) {
        //     $data[$i]['grade'] = 'A';
        // } else if ($persenan <= 90/100) {
        //     $data[$i]['grade'] = 'B';
        // } else {
        //     $data[$i]['grade'] = 'C';
        // }

        if ($persenan <= 80/100) {
            $data[$i]['grade'] = 'A';
        } else if ($persenan <= 90/100) {
            $data[$i]['grade'] = 'B';
        } else {
            $data[$i]['grade'] = 'C';
        }
    }

    return view('welcome', [
        'data' => $data, 
        'show' => $show, 
        'totalSemuaItem' => $totalSemuaItem, 
        'totalJumlahNilai' => $totalJumlahNilai, 
        'label' => $label,
        'labelPersenan' => $labelPersen,
        'totalTransaksiBarangMasuk' => ReceivedItem::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count(), 
        'totalSuplier' => Supplier::count(),
        'totalPelanggan' => Costumer::count()
    ]);

})->middleware('auth');

Route::resource('category', CategoryController::class)->middleware('auth');

Route::get('login', [AuthController::class, 'index'])->middleware('guest')->name('login');

Route::post('login', [AuthController::class, 'authenticate'])->middleware('guest');

Route::post('logout', [AuthController::class, 'logout'])->middleware('auth');

Route::resource('item', ItemController::class)->middleware('auth');

Route::resource('supplier', SupplierController::class)->middleware('auth');

Route::resource('received-item', ReceivedItemController::class)->middleware('auth');

Route::resource('leaving-item', LeavingItemController::class)->middleware('auth');

Route::resource('costumer', CostumerController::class)->middleware('auth');

Route::get('/opname-stok', [ItemController::class, 'opnameStok'])->middleware('auth');

// Cetak :
Route::post('cetak-opname', [ItemController::class, 'cetakOpname'])->middleware('auth');
Route::post('cetak-received-item', [ReceivedItemController::class, 'cetak'])->middleware('auth');
Route::post('cetak-leaving-item', [LeavingItemController::class, 'cetak'])->middleware('auth');