<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display all products
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $products = Product::all();
        return response()->json([
            'message' => 'Data produk berhasil diambil',
            'data' => $products
        ]);
    }

    /**
     * Store a new product using Service & Validation
     *
     * @param StoreProductRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProductRequest $request)
    {
        try {
            $product = $this->productService->createProduct($request->validated());
            return response()->json([
                'message' => 'Data produk berhasil ditambah',
                'data' => $product
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display a specific product
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $product = Product::findOrFail($id);
            return response()->json([
                'message' => 'Data produk berhasil diambil',
                'data' => $product
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Produk tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Update an existing product with validation
     *
     * @param UpdateProductRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateProductRequest $request, $id)
    {
        try {
            $product = Product::findOrFail($id);
            $product = $this->productService->updateProduct($product, $request->validated());
            return response()->json([
                'message' => 'Data produk berhasil diubah',
                'data' => $product
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete a product
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
{
    try {
        // 1. Tambahkan pengecekan role di sini
        if (auth()->user()->role !== 'admin') {
            return response()->json([
                'message' => 'Akses Ditolak: Hanya Admin yang boleh menghapus data produk'
            ], 403); // 403 adalah kode standar untuk "Forbidden"
        }

        // 2. Kode asli Anda tetap berjalan setelah pengecekan di atas lolos
        $product = Product::findOrFail($id);
        $this->productService->deleteProduct($product);

        return response()->json([
            'message' => 'Data produk berhasil dihapus'
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage()
        ], 500);
    }
}
}
