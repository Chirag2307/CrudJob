<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
class CrudJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $CreateData;
    protected $update;
    protected $delete;
    protected $fetch;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($CreateData= [null] ,$delete=null)
    { $this->CreateData = $CreateData;
     $this->delete= $delete;
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    { 
        if($this->CreateData){
        $this->create();
    }
    if($this->delete){
        $this->delete();
    }
        
        //
    }
     public function create(){
        
        $data = User::create($this->CreateData);
    }
  public function delete()
  {
    $user = User::find($this->delete);
    if($user){
        $user->delete();
    }

  }

}
// $job = new CrudJob($CreateData);
// $job->setDelete($delete);
// $job->setFetch($fetch);
// $job->setUpdate($update);
