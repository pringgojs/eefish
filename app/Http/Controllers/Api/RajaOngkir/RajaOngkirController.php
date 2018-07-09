<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/27/2017
 * Time: 9:37 AM
 */
namespace App\Http\Controllers\Api\RajaOngkir;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Adapter\RajaOngkirAdapter;
use App\Classes\AdditionalFunctionClass;

class RajaOngkirController extends Controller
{

    protected $additionalClass;

    public function __construct()
    {
        $this->additionalClass = new AdditionalFunctionClass();
    }

    public function getProvince()
    {
        $adapter = new RajaOngkirAdapter();
        $requestCurl = $adapter->curlAdapter("/province", 1, []);
        $requestCurl = json_decode($requestCurl);

        if(isset($requestCurl->rajaongkir->status->code)){

            if($requestCurl->rajaongkir->status->code == 200){
                $data = $requestCurl->rajaongkir->results;

                $params = [
                    'code' => 302,
                    'description' => 'Found',
                    'message' => 'Success to get province!',
                    'data' => $data
                ];

                return response()->json($params);
            }else{
                return $this->additionalClass->returnApiMessage("GET_RAJAONGKIR_PROVINCE", 404, "Failed when get data from vendor", []);
            }

        }else{
            return $this->additionalClass->returnApiMessage("GET_RAJAONGKIR_PROVINCE", 500, "Problem with vendor", []);
        }

    }


    public function getCity(Request $request)
    {
        $province = $request->get('province');
        if(is_null($province)){
            return $this->additionalClass->returnApiMessage("GET_RAJAONGKIR_CITY", 404, "Missing required parameter province", []);
        }

        $adapter = new RajaOngkirAdapter();
        $requestCurl = $adapter->curlAdapter("/city?province=".$province, 1, []);
        $requestCurl = json_decode($requestCurl);

        if(isset($requestCurl->rajaongkir->status->code)){

            if($requestCurl->rajaongkir->status->code == 200){
                $data = $requestCurl->rajaongkir->results;

                $params = [
                    'code' => 302,
                    'description' => 'Found',
                    'message' => 'Success to get city!',
                    'data' => $data
                ];

                return response()->json($params);
            }else{
                return $this->additionalClass->returnApiMessage("GET_RAJAONGKIR_CITY", 404, "Failed when get data from vendor", []);
            }

        }else{
            return $this->additionalClass->returnApiMessage("GET_RAJAONGKIR_CITY", 500, "Problem with vendor", []);
        }

    }


    public function getCost(Request $request)
    {
        $origin = $request->input('origin');
        $destination = $request->input('destination');
        $weight = $request->input('weight');
        $courier = "jne";

        $params = [
            'origin' => $origin,
            'destination' => $destination,
            'weight' => $weight,
            'courier' => $courier
        ];

        if(is_null($origin)){
            return $this->additionalClass->returnApiMessage("GET_RAJAONGKIR_COST", 404, "Missing required parameter origin", json_encode($params));
        }

        if(is_null($destination)){
            return $this->additionalClass->returnApiMessage("GET_RAJAONGKIR_COST", 404, "Missing required parameter destination", json_encode($params));
        }

        if(is_null($weight)){
            return $this->additionalClass->returnApiMessage("GET_RAJAONGKIR_COST", 404, "Missing required parameter weigth", json_encode($params));
        }

        if(is_null($courier)){
            return $this->additionalClass->returnApiMessage("GET_RAJAONGKIR_COST", 404, "Missing required parameter courier", json_encode($params));
        }

        $adapter = new RajaOngkirAdapter();
        $requestCurl = $adapter->curlAdapter("/cost", 2, $params);
        $requestCurl = json_decode($requestCurl);

        if(isset($requestCurl->rajaongkir->status->code)){

            if($requestCurl->rajaongkir->status->code == 200){
                $services = $requestCurl->rajaongkir->results;
                $data = [];

                if(count($services) == 0){
                    return $this->additionalClass->returnApiMessage("GET_RAJAONGKIR_COST", 404, "Missing data from vendor", []);
                }

                foreach ($services[0]->costs as $num => $item){
                    foreach ($item->cost as $no => $cost){
                        $data[] = [
                            'service' => $item->service,
                            'description' => $item->description,
                            'cost' => $cost->value,
                            'etd' => $cost->etd,
                        ];
                    }
                }


                $params = [
                    'code' => 302,
                    'description' => 'Found',
                    'message' => 'Success to get cost!',
                    'data' => $data
                ];

                return response()->json($params);
            }else{
                return $this->additionalClass->returnApiMessage("GET_RAJAONGKIR_COST", 404, "Failed when get data from vendor", []);
            }

        }else{
            return $this->additionalClass->returnApiMessage("GET_RAJAONGKIR_COST", 500, "Problem with vendor", []);
        }



    }

}