<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\ProcessUtils;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Process\PhpExecutableFinder;

class ServeCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'serve';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Serve the application on the PHP development server';
    
    /**
     * Execute the console command.
     *
     * @return int
     *
     * @throws \Exception
     */
    public function handle()
    {
        $publicPath = base_path('public/');
        chdir($publicPath);
        
        $this->line("<info>Laravel development server started:</info> <http://{$this->host()}:{$this->port()}>");
        
        passthru($this->serverCommand(), $status);
        
        return $status;
    }
    
    /**
     * Get the full server command.
     *
     * @return string
     */
    protected function serverCommand()
    {
        $command = sprintf('%s -S %s:%s %s',
            ProcessUtils::escapeArgument((new PhpExecutableFinder)->find(false)),
            $this->host(),
            $this->port(),
            ProcessUtils::escapeArgument(base_path('public/index.php'))
        );
        
        $this->info("Command:".$command);
        
        return $command;
    }
    
    /**
     * Get the host for the command.
     *
     * @return string
     */
    protected function host()
    {
        return $this->input->getOption('host');
    }
    
    /**
     * Get the port for the command.
     *
     * @return string
     */
    protected function port()
    {
        return $this->input->getOption('port');
    }
    
    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['host', null, InputOption::VALUE_OPTIONAL, 'The host address to serve the application on.', '127.0.0.1'],
            
            ['port', null, InputOption::VALUE_OPTIONAL, 'The port to serve the application on.', 8000],
        ];
    }
}
