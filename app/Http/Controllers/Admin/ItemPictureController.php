<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ItemPictureRepository;
use Illuminate\Http\Request;

class ItemPictureController extends Controller
{
	/**
	 * @var ItemPictureRepository
	 */
	private $repository;

	/**
	 * Constructor
	 *
	 * @param ItemPictureRepository $repository
	 */
	public function __construct(ItemPictureRepository $repository)
	{
		$this->repository = $repository;
	}

    /**
     * Remove the specified resource in storage.
     *
     * @param  string $picture
     * @return Response
     */
    public function destroy($picture)
    {
		$item = $this->repository->delete($picture);

		return redirect()->route('item.edit', [$item->id, $item->product_id, $item->product_size_id])->with('success', 'Foto excluída com sucesso!');
	}
}
