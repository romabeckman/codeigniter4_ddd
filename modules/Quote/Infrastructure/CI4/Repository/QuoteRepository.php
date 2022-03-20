<?php

namespace Quote\Infrastructure\CI4\Repository;

use \Quote\Domain\Entity\Quote;
use \Quote\Domain\Repository\QuoteRepositoryInterface;
use \Quote\Infrastructure\CI4\Model\QuoteModel;

/**
 * Description of QuoteRepository
 *
 * @author Romário Beckman <romabeckman@yahoo.com.br>
 */
class QuoteRepository implements QuoteRepositoryInterface {

    public function createQuote(Quote $quote): void {
        $quoteModel = new QuoteModel();
        $quoteModel->insert(
                [
                    'customer_id' => $quote->getCustomer()->getId()->getId(),
                    'valid_at' => $quote->getValidAt()->formatToYYYYMMDD(),
                    'status' => $quote->getStatus()->getStatus()
                ]
        );

        $quote->replaceId($quoteModel->insertID);
    }

}
