<?php
namespace App\Services;

use App\Repositories\UserRepository;

class HandleUserService {

    protected $user;
    protected $request;

    public function __construct($user, $request)
    {
        $this->user = $user;
        $this->request = $request;
    }

    public function updateUser()
    {
        $userRepo = new UserRepository;
        $datas = $this->request->all();
        $detail = $this->user->profile()->first();
        if($this->request->hasFile('image')){
            $service = new HandleImageService($this->request, null, 'avatars');
            $datas['profile']['avatar'] = $service->excute();
            $service->handleOldImage($detail->avatar);
        }
        $update = $userRepo->updateById($this->user->id, $datas);
        if ($update && $datas['profile'])
            if($detail == null){
                $this->user->profile()->create($datas['profile']);
            }else{
                $detail->update($datas['profile']);
            }

        return true;
    }
}

?>
