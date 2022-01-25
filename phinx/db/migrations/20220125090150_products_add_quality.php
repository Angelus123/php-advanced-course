<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class ProductsAddQuality extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $exists = $this ->hasTable('products');
        if($exists){
            // $products = $this->table('products');
            // $products->addColumn('price', 'integer',['after' => 'name'])
            // ->save();
            $this->execute("ALTER TABLE products
            ADD qa  varchar(255);");
            // $this->query();
        }

    }
}
