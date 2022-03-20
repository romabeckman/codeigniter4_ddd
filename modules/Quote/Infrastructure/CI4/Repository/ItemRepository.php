<?php

namespace Quote\Infrastructure\CI4\Repository;

use \Quote\Domain\Entity\Item;
use \Quote\Domain\Entity\Quote;
use \Quote\Domain\Repository\ItemRepositoryInterface;
use \Quote\Infrastructure\CI4\Model\ItemModel;

/**
 * Description of ItemRepository
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class ItemRepository implements ItemRepositoryInterface {

    private function createItem(Item $item, int $quoteId): void {
        $itemModel = new ItemModel();
        $itemModel->insert([
            'quote_id' => $quoteId,
            'product' => $item->getProduct()->getProduct(),
            'amount' => $item->getAmount()->getAmount(),
            'quantity' => $item->getAmount()->getQuantity()
        ]);
        $item->replaceId($itemModel->insertID);
    }

    public function createItens(Quote $quote): void {
        foreach ($quote->getItens() as $item) {
            $this->createItem($item, $quote->getId()->getId());
        }
    }

}
