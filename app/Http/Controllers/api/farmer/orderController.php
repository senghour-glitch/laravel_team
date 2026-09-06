<?php

namespace App\Http\Controllers\Api\Farmer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class OrderController extends Controller
{
    private const STATUSES = [
        'pending', 'confirmed', 'packed', 'dispatched',
        'out_for_delivery', 'delivered', 'cancelled',
    ];

    /**
     * Orders that contain at least one item from one of this farmer's products.
     */
    public function index(Request $request)
    {
        $farmIds = $request->user()->farms()->pluck('id');

        return Order::whereHas('items.product', function ($query) use ($farmIds) {
            $query->whereIn('farm_id', $farmIds);
        })->with(['items.product'])->latest()->get();
    }

    public function show(Request $request, Order $order)
    {
        $farmIds = $request->user()->farms()->pluck('id');
        $this->authorizeOrder($order, $farmIds);

        // Only show this farmer their own items within the order, not other farms' items.
        $order->load(['items.product' => function ($query) use ($farmIds) {
            $query->whereIn('farm_id', $farmIds);
        }]);

        return $order;
    }

    public function updateStatus(Request $request, Order $order)
    {
        $farmIds = $request->user()->farms()->pluck('id');
        $this->authorizeOrder($order, $farmIds);

        $data = $request->validate([
            'status' => ['required', 'in:' . implode(',', self::STATUSES)],
        ]);

        $order->update($data);

        return $order;
    }

    private function authorizeOrder(Order $order, $farmIds): void
    {
        $hasItem = $order->items()
            ->whereHas('product', fn ($query) => $query->whereIn('farm_id', $farmIds))
            ->exists();

        if (! $hasItem) {
            throw new HttpException(403, 'This order does not contain any of your products.');
        }
    }
}