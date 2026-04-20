namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Exception;

class ProductService
{
    /**
     * Create a new product
     *
     * @param array $data
     * @return Product
     * @throws Exception
     */
    public function createProduct(array $data)
    {
        try {
            return Product::create($data);
        } catch (Exception $e) {
            Log::error("Gagal menambah produk: " . $e->getMessage());
            throw new Exception("Terjadi kesalahan pada server saat menyimpan data.");
        }
    }

    /**
     * Update an existing product
     *
     * @param Product $product
     * @param array $data
     * @return Product
     * @throws Exception
     */
    public function updateProduct(Product $product, array $data)
    {
        try {
            $product->update($data);
            return $product;
        } catch (Exception $e) {
            Log::error("Gagal mengubah produk: " . $e->getMessage());
            throw new Exception("Terjadi kesalahan pada server saat mengubah data.");
        }
    }

    /**
     * Delete a product
     *
     * @param Product $product
     * @return bool
     * @throws Exception
     */
    public function deleteProduct(Product $product)
    {
        try {
            return $product->delete();
        } catch (Exception $e) {
            Log::error("Gagal menghapus produk: " . $e->getMessage());
            throw new Exception("Terjadi kesalahan pada server saat menghapus data.");
        }
    }
}
