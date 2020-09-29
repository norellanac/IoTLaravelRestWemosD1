<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\AlertMail;
use DB;

class email extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'alert email record';

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
     * @return mixed
     */
    public function handle()
    {
        $alert= DB::selectone('SELECT extract(HOUR from now()) - extract(HOUR from max(created_at) ) tiempo from records order by id desc');

        if($alert->tiempo >= 2){
          $request->string1="No se han ingresado";
          $request->string2="nuevos registro durante 2 horas";
          $data = new Request(["string1" => $request->string1, "string2" => $request->string2]);
          Mail::to(['bgil@10x.org'])
          ->cc(['pispache@10x.org', 'drodas@10x.org', 'vbala@10x.org', 'mprado@neoethicals.com']) // enviar correo con copia
          ->send(new AlertMail($data)); //envia la variables $request a la clase de
        }

        $requests = DB::select('SELECT * FROM records ORDER by id DESC LIMIT 6');

        foreach($requests As $request){
          $user = DB::selectone('SELECT * FROM users where id=?', [$request->user_id]);
          if ($request->number1>=70) {
            $request->string1="Humedad";
            $request->string2=$request->number1 . " % en el dispositivo: " . $request->device;
            $data = new Request(["string1" => $request->string1, "string2" => $request->string2]);
            Mail::to([$user->email])
            ->cc(['pispache@10x.org', 'bgil@10x.org', 'drodas@10x.org', 'vbala@10x.org', 'mprado@neoethicals.com']) // enviar correo con copia
            ->send(new AlertMail($data)); //envia la variables $request a la clase de
          }
          //envia notificacion si la temperatura es alta
          if ($request->number2>=28) {
            $request->string1="Temperatura";
            $request->string2=$request->number2 ." C° en el dispositivo: " . $request->device;
            $data = new Request(["string1" => $request->string1, "string2" => $request->string2]);
            Mail::to([$user->email])
            ->cc(['pispache@10x.org', 'bgil@10x.org', 'drodas@10x.org', 'vbala@10x.org', 'mprado@neoethicals.com']) // enviar correo con copia
            ->send(new AlertMail($data)); //envia la variables $request a la clase de
          }
          //envia notificacion si la bateria es baja
          if ($request->number3<=3.1) {
            $request->string1="Bateria";
            $request->string2=round(($request->number3 -2.7 ) * 59) ."% en el dispositivo: " . $request->device;
            $request->number1=65;
            $data = new Request(["string1" => $request->string1, "string2" => $request->string2]);
            Mail::to([$user->email])
            ->cc(['pispache@10x.org', 'bgil@10x.org', 'drodas@10x.org', 'vbala@10x.org', 'mprado@neoethicals.com']) // enviar correo con copia
            ->send(new AlertMail($data)); //envia la variables $request a la clase de
          }
        }
        $this->info('Se proceso con exito');
    }
}
