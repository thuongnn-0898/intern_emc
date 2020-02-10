<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return Product
    */
    use Importable, SkipsFailures;

    public function model(array $row)
    {
        return new Product([
            'name' => $row['name'],
            'price' => $row['price'],
            'image' => $row['image'],
            'shortText' => $row['shorttext'],
            'longText' => $row['longtext'],
            'quantity' => $row['quantity'],
            'category_id' => $row['category_id'],
        ]);
    }

    /**
     * @inheritDoc
     */
    public function rules(): array
    {
        return [
            'name' => "required|unique:products,name",
            'price' => "required|numeric",
            'image' => "required",
            'shorttext' => "required",
            'longtext' => "required",
            'quantity' => "required|numeric",
            'category_id' => "required|numeric",
        ];
    }
}
