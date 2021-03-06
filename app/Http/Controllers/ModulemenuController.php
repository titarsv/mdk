<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modules;
use App\Http\Requests;

class ModuleMenuController extends Controller
{
    protected $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function index()
    {
        $module = Modules::where('alias_name', 'menu')->first();
        $settings = json_decode($module->settings);
        $parts = [
            'verhnyaya-odezhda' => 'Женская верхняя одежда',
            'aksessuary' => 'Женские аксессуары',
            'verhnyaya-odezhda_2' => 'Мужская верхняя одежда',
            'aksessuary_3' => 'Мужские аксессуары',
            'drugoe' => 'Другое',
        ];

        return view('admin.modules.menu')
            ->with('module', $module)
            ->with('parts', $parts)
            ->with('settings', $settings);
    }

    public function save()
    {
        $modules = Modules::all();
        $module = Modules::where('alias_name', 'menu')->first();
        $menu = [];

        if(is_array($this->request->menu)){
            foreach($this->request->menu as $key => $part){
                foreach($part as $item){
                    if(!empty($item['name']) && !empty($item['href'])){
                        $menu[$key][] = $item;
                    }
                }
            }
        }

        $settings = json_encode($menu);

        $module->status = 1;
        $module->settings = $settings;
        $module->save();

        return redirect('admin/modules')
            ->with('modules', $modules)
            ->with('message-success', 'Настройки модуля ' . $module->name . ' успешно обновлены!');
    }
}
