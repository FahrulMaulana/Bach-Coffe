<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllTables extends Migration
{
    public function up()
    {
        // Tabel Admin
        Schema::create('tbl_admin', function (Blueprint $table) {
            $table->id('id_admin');
            $table->string('username', 50)->unique();
            $table->string('password', 255);
            $table->string('nama_lengkap', 100);
            $table->timestamps();
        });

        // Tabel Member
        Schema::create('tbl_member', function (Blueprint $table) {
            $table->id('id_member');
            $table->string('nomor_hp', 15)->unique();
            $table->string('nama_member', 100);
            $table->string('email', 100)->unique();
            $table->string('password', 255);
            $table->integer('total_poin')->default(0);
            $table->timestamps();
        });

        // Tabel Histori Transaksi
        Schema::create('tbl_histori_transaksi', function (Blueprint $table) {
            $table->id('id_histori');
            $table->unsignedBigInteger('id_member');
            $table->text('deskripsi');
            $table->timestamp('tanggal')->useCurrent();
            $table->foreign('id_member')->references('id_member')->on('tbl_member')->onDelete('cascade');
            $table->timestamps();
        });

        // Tabel Kasir
        Schema::create('tbl_kasir', function (Blueprint $table) {
            $table->id('id_kasir');
            $table->string('username', 50)->unique();
            $table->string('password', 255);
            $table->string('nama_lengkap', 100);
            $table->timestamps();
        });

        // Tabel Notifikasi
        Schema::create('tbl_notifikasi', function (Blueprint $table) {
            $table->id('id_notifikasi');
            $table->unsignedBigInteger('id_member');
            $table->text('pesan_notifikasi');
            $table->timestamp('tanggal')->useCurrent();
            $table->foreign('id_member')->references('id_member')->on('tbl_member')->onDelete('cascade');
            $table->timestamps();
        });

        // Tabel Produk
        Schema::create('tbl_produk', function (Blueprint $table) {
            $table->id('id_produk');
            $table->string('nama_produk', 100);
            $table->double('harga_produk');
            $table->text('promo')->nullable();
            $table->timestamps();
        });

        // Tabel Reset Password
        Schema::create('tbl_reset_password', function (Blueprint $table) {
            $table->id('id_reset');
            $table->string('nomor_hp', 15);
            $table->string('otp', 10);
            $table->timestamp('tanggal_expired');
            $table->foreign('nomor_hp')->references('nomor_hp')->on('tbl_member')->onDelete('cascade');
            $table->timestamps();
        });

        // Tabel Transaksi
        Schema::create('tbl_transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->unsignedBigInteger('id_member');
            $table->unsignedBigInteger('id_kasir');
            $table->timestamp('tanggal_transaksi')->useCurrent();
            $table->double('total_harga');
            $table->integer('poin_didapat');
            $table->foreign('id_member')->references('id_member')->on('tbl_member')->onDelete('cascade');
            $table->foreign('id_kasir')->references('id_kasir')->on('tbl_kasir')->onDelete('cascade');
            $table->timestamps();
        });

        // Tabel Voucher
        Schema::create('tbl_voucher', function (Blueprint $table) {
            $table->id('id_voucher');
            $table->unsignedBigInteger('id_member');
            $table->string('kode_voucher', 50)->unique();
            $table->integer('poin_terpakai');
            $table->enum('status_voucher', ['aktif', 'selesai'])->default('aktif');
            $table->timestamp('tanggal_klaim')->useCurrent();
            $table->foreign('id_member')->references('id_member')->on('tbl_member')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_voucher');
        Schema::dropIfExists('tbl_transaksi');
        Schema::dropIfExists('tbl_reset_password');
        Schema::dropIfExists('tbl_produk');
        Schema::dropIfExists('tbl_notifikasi');
        Schema::dropIfExists('tbl_kasir');
        Schema::dropIfExists('tbl_histori_transaksi');
        Schema::dropIfExists('tbl_member');
        Schema::dropIfExists('tbl_admin');
    }
}
