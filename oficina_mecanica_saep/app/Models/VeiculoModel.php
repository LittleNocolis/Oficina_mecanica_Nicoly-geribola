<?php

namespace App\Models;

use CodeIgniter\Model;

class VeiculoModel extends Model
{
    protected $table = 'VEICULO';

    protected $primaryKey = 'VEI_ID';

    protected $allowedFields = [
        'VEI_MODELO',
        'VEI_MARCA',
        'VEI_ANO',
        'VEI_PLACA',
        'FK_CLI_ID'
    ];
}