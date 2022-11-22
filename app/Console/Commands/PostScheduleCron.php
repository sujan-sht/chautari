<?php

namespace App\Console\Commands;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Console\Command;

class PostScheduleCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $currentDate=strtotime(Carbon::now());
        $allPosts=Post::where('status','scheduled')->get();
        foreach ($allPosts as $key => $post) {
            $postDate=strtotime($post->scheduled_dt);
            $min = ($postDate - $currentDate) / 60;
            if($min<0){
                Post::where('id',$post->id)->update(['status' => 'published']);
            }
        }
    }
}
