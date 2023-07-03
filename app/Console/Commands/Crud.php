<?php

namespace App\Console\Commands;

use App\Jobs\CrudJob;
use Illuminate\Console\Command;

class Crud extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'do:crud {--create}{--update}{--delete}{--fetch}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {  
       if($this->option('create')){
        $this->create();
       };
       if($this->option('delete')){
        $this->delete();
       };
        if($this->option('fetch'));
        if($this->option('update'));
        
        
        //CrudJob::dispatch($create,$delete,$fetch,$update);
        //return Command::SUCCESS;
    }
    public function create(){
        $name = $this->ask("Name?");
        $age = $this->ask("Age?");
        $mail = $this->ask("Mail Id?");

        $CreateData =['name'=>$name,'age'=>$age,'email'=>$mail];
        
        CrudJob::dispatch($CreateData);
        $this->info("Done");
    }

    public function delete(){
        $id = $this->ask('id?');

        CrudJob::dispatch($id);
        $this->info("Done");
    }
}
