<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/27/2017
 * Time: 9:37 AM
 */
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Classes\AdditionalFunctionClass;

class ApiRegisterController extends Controller
{

    /*
     * Action untuk proses login
     * Created by Budi Santoso
     * Params @username and @password
     */

    private $additionalFunction;

    public function __construct()
    {
        $this->additionalFunction = new AdditionalFunctionClass();
    }

    public function register(Request $request)
    {
        $apiName = "REGISTER";
        $username = $request->input('username');
        $password = $request->input('password');
        $identityNumber = $request->input('identity_number');
        $address = $request->input('address');
        $phoneNumber = $request->input('phone_number');
        $name = $request->input('name');
        $email = $request->input('email');
        $postCode = $request->input('postcode');

        $sendingParams = [
            'username' => $username,
            'password' => $password,
            'identity_number' => $identityNumber,
            'address' => $address,
            'phone_number' => $phoneNumber,
            'name' => $name,
            'email' => $email,
            'postcode' => $postCode
        ];

        if(is_null($username)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter username!", json_encode($sendingParams) );
        }

        if(is_null($password)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter password!", json_encode($sendingParams) );
        }


        if(is_null($identityNumber)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter identity_number!", json_encode($sendingParams) );
        }


        if(is_null($address)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter address!", json_encode($sendingParams) );
        }


        if(is_null($phoneNumber)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter phone_number!", json_encode($sendingParams) );
        }


        if(is_null($name)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter name!", json_encode($sendingParams) );
        }


        if(is_null($email)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter email!", json_encode($sendingParams) );
        }

        if(is_null($postCode))
        {
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter postcode!", json_encode($sendingParams) );
        }

        $activeUser = User::where(['user_username' => $username])->first();
        if(!is_null($activeUser)){
            return $this->additionalFunction->returnApiMessage($apiName, 403, "Username already used!", json_encode($sendingParams) );
        }

        $data = new User();
        $data->user_username = $username;
        $data->user_password = sha1($password);
        $data->user_identity_number = $identityNumber;
        $data->user_address = $address;
        $data->user_cities_id = 2;
        $data->user_phone_number = $phoneNumber;
        $data->user_full_name = $name;
        $data->user_email = $email;
        $data->user_post_code = $postCode;

        try{
            $data->save();
            $params = [
                'code' => 302,
                'description' => 'Found',
                'message' => 'Registration success!',
            ];

            return response()->json($params);
        }catch (\Exception $e){
            return $this->additionalFunction->returnApiMessage($apiName, 403, "Registration failed!", json_encode($sendingParams) );
        }

    }


    public function updateProfile(Request $request)
    {
        $apiName = "UPDATE_PROFILE";
        $userUsername = $request->input('user_username');
        $userPassword = $request->input('user_password');
        $userConfirmPassword = $request->input('user_confirm_password');
        $userIdentityNumber = $request->input('user_identity_number');
        $userAddress = $request->input('user_address');
        $userPostcode = $request->input('user_postcode');
        $userCityId = 2;
        $userPhoneNumber = $request->input('user_phone_number');
        $userFullname = $request->input('user_full_name');
        $userEmail = $request->input('user_email');
        $userId = $request->input('user_id');

        $sendingParams = [
            'user_username' => $userUsername,
            'user_password' => $userPassword,
            'user_confirm_password' => $userConfirmPassword,
            'user_identity_number' => $userIdentityNumber,
            'user_address' => $userAddress,
            'user_postcode' => $userPostcode,
            'user_phone_number' => $userPhoneNumber,
            'user_full_name' => $userFullname,
            'user_email' => $userEmail,
            'user_id' => $userId
        ];

        if(is_null($userId)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter user_id!", json_encode($sendingParams) );
        }

        /*if(is_null($userUsername)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter user_username!", json_encode($sendingParams) );
        }*/

        if(is_null($userPassword)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter user_password!", json_encode($sendingParams) );
        }

        if(is_null($userConfirmPassword)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter user_confirm_password!", json_encode($sendingParams) );
        }

        /*if(is_null($userIdentityNumber)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter user_identity_number!", json_encode($sendingParams) );
        }*/

        if(is_null($userAddress)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter user_address!", json_encode($sendingParams) );
        }

        if(is_null($userPostcode)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter user_postcode!", json_encode($sendingParams) );
        }

        if(is_null($userPhoneNumber)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter user_phone_number!", json_encode($sendingParams) );
        }

        if(is_null($userFullname)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter user_full_name!", json_encode($sendingParams) );
        }

        if(is_null($userEmail)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter user_email!", json_encode($sendingParams) );
        }


        $data = User::find($userId);
        if(is_null($data))
        {
            return $this->additionalFunction->returnApiMessage($apiName, 404, 'User not found!', json_encode($sendingParams));
        }

        if($userPassword != $userConfirmPassword)
        {
            return $this->additionalFunction->returnApiMessage($apiName, 404, 'New password not match with confirmation password!', json_encode($sendingParams));
        }  


        $data->user_password = sha1($userPassword);
        $data->user_address = $userAddress;
        $data->user_post_code = $userPostcode;
        $data->user_phone_number = $userPhoneNumber;
        $data->user_full_name = $userFullname;
        $data->user_email = $userEmail;



        $picture = $request->file('user_picture');
        if (isset($picture)) {
            $filename = date("YmdHis"). '-' . $picture->getClientOriginalName();
            if ($picture->move("public/uploads/pengguna", $filename)) {
                $data->user_picture = $filename;
            }
        }


        try{
            $data->save();

            $activeUser = User::find($userId);
            $data = [
                'id' => $activeUser->id,
                'username' => $activeUser->user_username,
                'identity_number' => $activeUser->user_identity_number,
                'address' => $activeUser->user_address,
                'post_code' => $activeUser->user_post_code,
                'picture' => 'public/uploads/pengguna/'.$activeUser->user_picture,
                'city_id' => $activeUser->user_cities_id,
                'phone_number' => $activeUser->user_phone_number,
                'name' => $activeUser->user_full_name,
                'email' => $activeUser->user_email
            ];

            $params = [
                'code' => 302,
                'description' => 'Found',
                'message' => 'Update profile success!',
                'data' => $data
            ];

            return response()->json($params);

        }catch(\Exception $e){
            return $this->additionalFunction->returnApiMessage($apiName, 404, 'Failed to update user profile!', json_encode($sendingParams));
        }



    }
}