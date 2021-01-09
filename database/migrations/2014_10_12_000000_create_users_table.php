<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            /**
             * Dados referente a tabela user
             *
             * ID
             * login
             * password
             * user_type
             * full_name
             * cpf
             * gender
             * phone
             * email
             * status
             **/
            $table->bigIncrements('id');                        // ID
            $table->string('full_name')->nullable(false);       // Nome completo
            $table->string('phone', 11)->nullable(false);           // Telefone de contato
            $table->string('cpf', 11)->nullable(false);             // CPF

            $table->enum('gender', ['M', 'F', 'O'])->nullable(false)
                ->comment('Define o gênero com uma letra ( M : Masculino, F : Feminino, O : Outro )');            // Genero
            $table->boolean('status')->nullable(false)->default(true)
                ->comment('Define se o usuário está ativo no sistema ( true , false ) o valor padrão true');
            $table->enum('user_type', ['PAI', 'PRO', 'COR'])->nullable(false)->default('PAI')
                ->comment('Descreve o tipo de acesso a cada usuário como o padrão de 3 letras ( PAI: Representa os pais, PRO: Representa os professores, COR: Representa a coordenação ) o valor padrão e PAI');

            $table->string('login', 60)->unique();            // Login de acesso
            $table->string('email')->unique()->nullable(false);  // E-mail
            $table->string('password');         // Senha
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
