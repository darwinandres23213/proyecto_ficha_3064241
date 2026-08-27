<?php

namespace App\Repository;

use App\Interfaces\EventoInterface;
use App\Models\Evento;

class EventoRepository extends BaseRepository implements EventoInterface
{
    public function __construct(Evento $ev)
    {
        parent::__construct($ev);
    }

    public function calcularRecaudo(int $aforo, float $precio_entrada)
    {
        return $aforo * $precio_entrada;
    }

    public function buscarPorNombre(string $nombre)
    {
        return $this->model->where('nombre', 'like', '%' . $nombre . '%')->get();
    }

    public function buscarPorAforo(int $aforo)
    {
        return $this->model->where('aforo', $aforo)->get();
    }
}