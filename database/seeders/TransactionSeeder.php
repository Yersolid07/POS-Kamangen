<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        // Get Galon product
        $galon = Product::where('name', 'like', '%Galon%')->first();
        
        if (!$galon) {
            echo "Produk Galon tidak ditemukan\n";
            return;
        }

        // Generate transactions for last 5 days
        for ($i = 4; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            
            // Generate 4-8 transactions per day to achieve 20-50 Galon sales
            $transactionsPerDay = rand(4, 8);
            $remainingGalonForDay = rand(20, 50); // Total Galon to be sold for the day
            
            for ($j = 0; $j < $transactionsPerDay && $remainingGalonForDay > 0; $j++) {
                // Calculate how many Galon for this transaction
                $maxGalonThisTransaction = min($remainingGalonForDay, 10); // Max 10 Galon per transaction
                $galonQty = ($j == $transactionsPerDay - 1) ? $remainingGalonForDay : rand(1, $maxGalonThisTransaction);
                
                $basePrice = $galon->price;
                $totalPrice = $galonQty * $basePrice;
                
                // Create transaction
                $transaction = Transaction::create([
                    'transaction_code' => 'P100' . mt_rand(1000, 9999),
                    'name' => 'Admin',
                    'total_price' => $totalPrice,
                    'accept' => $totalPrice, // Exact amount for simplicity
                    'return' => 0, // No return since exact amount
                    'created_at' => $date->copy()->addHours(rand(9, 17))->addMinutes(rand(0, 59)),
                    'updated_at' => $date->copy()->addHours(rand(9, 17))->addMinutes(rand(0, 59))
                ]);
                
                // Create transaction detail
                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $galon->id,
                    'qty' => $galonQty,
                    'name' => $galon->name,
                    'base_price' => $basePrice,
                    'base_total' => $totalPrice
                ]);
                
                $remainingGalonForDay -= $galonQty;
            }
        }
        
        echo "Seeder berhasil: Data transaksi Galon untuk 5 hari terakhir telah dibuat\n";
    }
} 