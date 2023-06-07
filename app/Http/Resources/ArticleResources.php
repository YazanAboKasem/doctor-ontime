<?php
//
//namespace App\Http\Resources;
//
//use Illuminate\Http\Resources\Json\JsonResource;
//
//class ArticleResources extends JsonResource
//{
//    /**
//     * Transform the resource into an array.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return array
//     */
//    public function toArray($request)
//    {
//
//        return [
//            'id' => $this->id,
//            'slugCode' => "{$this->fireStoreID}",
//            'code' => $this->id,
//            'name' => $this->name,
//            'title' => $this->description,
//            'categoryId' => $this->category->id,
//            'imagePath' => $this->images[0],
//            'businessProcessTypeId' => 0,
//            'endTime' => \Carbon\Carbon::parse($this->end_date)->timestamp,
//            'realPrice' => $this->real_price,
//            'lastPrice' => $this->last_price,
//            'favourite' => false,
//            "product" => [
//                "product"=>[
//                    'id' => $this->id,
//                    'slugCode' => "{$this->fireStoreID}",
//                    'code' =>"{$this->id}",
//                    'name' => $this->name,
//                    'title' => $this->About_this_item,
//                    'description' => $this->description,
//                    'alert' => $this->Note,
//                    'pdfPath' => null,
//                    'videoUrl' => null,
//                    'businessProcessTypeId' => 0,
//                    'realPrice' => $this->real_price,
//                    'lastPrice' => $this->last_price,
//                    'increasePrice' => 5,
//                    'totalBid' => 1,
//                    'totalBider' => 1,
//                    'totalView' => 1,
//                    'customerBidPrice' => $this->min_bid_price,
//                    'date' => \Carbon\Carbon::parse($this->end_date)->timestamp,
//                    'brand' => null,
//                    'category' => $this->category,
//                    'images' => $this->images,
//                    'tags' => $this->keywords,
//                    'productConditionName' => $this->statusCo()->get()->first()->name,
//                    'deliveryPrices' => $this->shipping_cost,
//                    'favourite' => false,
//
//
//                ],
//
//
//            ],
//
//        ];
//    }
//}
//
