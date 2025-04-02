<?php

namespace App\Traits;

use App\Models\Order;

trait ManageOrder {
	
	public function getIndexes(Order $order): array {
		$prettyDate   = $this->ftD($order->created_at);
		$idIndex      = strtoupper($order->user->name[0]) . ' ' . $this->ftN($order->id);
		$invoiceIndex = $this->ftD($order->created_at) . ' ' . $this->ftN($order->invoice_id);

		return [$idIndex, $invoiceIndex];
	}


	public function ftD(string $d, $sep = ''): string {
		return
		substr(string: $d, offset: 2, length: 2) . $sep .
		substr(string: $d, offset: 5, length: 2) . $sep .
		substr(string: $d, offset: 8, length: 2);
	}

	public function ftN(int|null $n): string {
		$str                = (string) $n;
		$formattedWholePart = sprintf('%06d', $n);

		return substr($formattedWholePart, 0, 3) . ' ' . substr($formattedWholePart, 3);
	}
	public function uuu() {
		return 'oki';
	}

}
