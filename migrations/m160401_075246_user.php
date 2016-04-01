<?php

use yii\db\Migration;
use yii\db\Schema;

class m160401_075246_user extends Migration
{
    /*public function up()
    {

    }

    public function down()
    {
        echo "m160401_075246_user cannot be reverted.\n";

        return false;
    }*/

    const TBL_NAME = 'user';

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $tableOptions = null;
        $this->createTable(self::TBL_NAME,[
            'id' => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'auth_key' => Schema::TYPE_STRING . '(32) NULL',
            'password' => Schema::TYPE_STRING . ' NOT NULL',
            'access_token' => Schema::TYPE_STRING,
            'email' => Schema::TYPE_STRING . ' NOT NULL',
            'role' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',

            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
        ],$tableOptions);

        $this->createIndex('user',self::TBL_NAME,['username'],true);
        $this->createIndex('email',self::TBL_NAME,['email'],true);
    }

    public function safeDown()
    {
        $this->dropTable(self::TBL_NAME);
    }

}
