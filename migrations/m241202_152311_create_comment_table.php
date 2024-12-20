<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m241202_152311_create_comment_table extends Migration

{
    /**
     * {@inheritdoc}
     */
    public function safeUp()

    {

        $this->createTable('{{%comment}}', [

            'id' => $this->primaryKey(),

            'text' => $this->string(),

            'user_id' => $this->integer(),

            'comment_id' => $this->integer(),

            'article_id' => $this->integer(),

            'date' => $this->date(),

            'delete' => $this->boolean(),

        ]);

// create index for column `user_id`

        $this->createIndex(

            'idx-post-user_id',

            'comment',

            'user_id'

        );

// add foreign key for table `user`

        $this->addForeignKey(

            'fk-comment-post-user_id',

            'comment',

            'user_id',

            'user',

            'id',

            'CASCADE'

        );

// create index for column `article_id`

        $this->createIndex(

            'idx-article_id',

            'comment',

            'article_id'

        );

// add foreign key for table `article`

        $this->addForeignKey(

            'fk-article_id',

            'comment',

            'article_id',

            'article',

            'id',

            'CASCADE'

        );

// create index for column `comment_id`

        $this->createIndex(

            'idx-comment_id',

            'comment',

            'comment_id'

        );

// add foreign key

        $this->addForeignKey(

            'fk-comment_id',

            'comment',

            'comment_id',

            'comment',

            'id',

            'CASCADE'

        );

    }
    /**
     * {@inheritdoc}
     */

    public function safeDown()
    {

        $this->dropTable('{{%comment}}');

    }

}