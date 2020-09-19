<?php


namespace App\Http\Repository;


use App\Http\Repository\Interfaces\BaseRepository;
use App\OrderItem;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class OrderItemRepository implements BaseRepository
{
    private $orderItemModel;
    private $productRepo;

    public function __construct(OrderItem $orderItemModel, ProductRepository $productRepo)
    {
        $this->orderItemModel = $orderItemModel;
        $this->productRepo = $productRepo;
    }

    public function find(int $id): ?Model
    {
        return $this->orderItemModel->find($id);
    }

    public function all(): ?Collection
    {
        // TODO: Implement all() method.
    }

    public function save(array $attributes): ?Model
    {
        // TODO: Implement save() method.
    }

    public function update(int $id, array $attributes): ?bool
    {
       return $this->orderItemModel->whereId($id)->update($attributes);
    }

    public function delete(int $id): ?bool
    {
        return $this->orderItemModel->destroy($id);
    }

    public function saveMany(array $attributes): ?bool{
        $items = [];
        foreach ($attributes['items'] as $attribute){
            $product = $this->productRepo->find($attribute['product_id']);

            $items[] = [
                'order_id' => $attributes['order_id'],
                'product_id' => $product->id,
                'product_price' => $product->unit_price,
                'product_code' => $product->code,
                'quantity' => $attribute['quantity']
            ];
        }

        return $this->orderItemModel->insert($items);
    }

    public function updateMany(array $attributes): ?bool{
        foreach ($attributes as $attribute){
            $order_item_id = $attribute['order_item_id'];
            unset($attribute['order_item_id']);

            if (key_exists('product_id',$attribute)){
                $product = $this->productRepo->find($attribute['product_id']);
                $attribute['product_code'] = $product->code;
                $attribute['product_price'] = $product->unit_price;
            }

            $this->orderItemModel->whereId($order_item_id)->update($attribute);
        }

        return true;

    }

    public function deleteMany($ids): ?bool
    {
        return $this->orderItemModel->destroy($ids);
    }

}
