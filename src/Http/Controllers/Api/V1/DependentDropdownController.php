<?php

namespace Saidy\VoyagerDependentDropdown\Http\Controllers\Api\V1;

// use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller;

class DependentDropdownController extends Controller {

	public function index() {

		$params = request()->all();

		$options = app($params['model'])->where($params['options']['where'], '=', $params['value'])->pluck($params['options']['label'], $params['options']['key']);

		return response()->json([
			'dropdown' => sprintf('#%s', $params['options']['name']),
			'options' => $options
		], 200);

	}
}
