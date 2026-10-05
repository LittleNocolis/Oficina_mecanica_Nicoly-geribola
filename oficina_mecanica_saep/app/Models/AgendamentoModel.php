<?php
namespace App\Models;
use CodeIgniter\Model;

// Model = representa a tabela no banco
class AgendamentoModel extends Model
{
    protected $table = 'AGENDAMENTO'; // nome da tabela
    protected $primaryKey = 'AGE_ID'; // chave primária

    // Campos permitidos para INSERT/UPDATE
    protected $allowedFields = [
        // colunas na tabela AGENDAMENTO do banco
        'AGE_DATA_HORA',
        'AGE_MOTIVO',
        'AGE_STATUS',
        'FK_VEI_ID',
        'FK_CLI_ID'
    ];
}