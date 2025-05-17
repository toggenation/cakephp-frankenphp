<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class Posts extends BaseMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/4/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $this->table('posts')
            ->addColumn('title', 'string')
            ->addColumn('body', 'text')
            ->addTimestampsWithTimezone('created', 'modified')
            ->create();
    }
}
