<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterToClientTypeClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('document_number')->unique()->change();
            $table->date('date_birth')->nullable()->change();
            \DB::statement('ALTER TABLE clients CHANGE COLUMN sex sex CHAR NULL');
            $maritalStatus = array_keys(\App\Client::MARITAL_STATUS);
            $maritalStatusString = array_map(function($value){
                return "'$value'";
            },$maritalStatus);
            $maritalStatusEnum = implode(',',$maritalStatusString);
            \DB::statement("ALTER TABLE clients CHANGE COLUMN marital_status marital_status ENUM($maritalStatusEnum) NULL");
            //$table->char('sex',10)->nullable()->change();
            //$table->enum('marital_status',array_keys(\App\Client::MARITAL_STATUS))
              //  ->nullable()->change();
            $table->string('company_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropUnique('clients_document_number_unique');
            $table->date('date_birth')->change();
            \DB::statement('ALTER TABLE clients CHANGE COLUMN sex sex CHAR NOT NULL');
            $maritalStatus = array_keys(\App\Client::MARITAL_STATUS);
            $maritalStatusString = array_map(function($value){
                return "'$value'";
            },$maritalStatus);
            $maritalStatusEnum = implode(',',$maritalStatusString);
            \DB::statement("ALTER TABLE clients CHANGE COLUMN marital_status marital_status ENUM($maritalStatusEnum) NOT NULL");
            //$table->char('sex',10)->change();
            //$table->enum('marital_status',array_keys(\App\Client::MARITAL_STATUS))->change();
            $table->dropColumn('company_name');
        });
    }
}
