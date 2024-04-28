<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::all();
        return view('subscribers.index', ['subscribers' => $subscribers]);
    }

    public function create()
    {
        return view('subscribers.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:subscribers,email',
            'tags' => 'nullable|array',
        ]);

        $subscriber = Subscriber::create($validated);

        return redirect()->route('subscribers.index')->with('success', 'Subscriber created successfully.');
    }

    public function show($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        return view('subscribers.show', compact('subscriber'));
    }

    public function edit($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        return view('subscribers.edit', compact('subscriber'));
    }


    public function update(Request $request, $id)
    {
        // Получаем подписчика из базы данных
        $subscriber = Subscriber::findOrFail($id);
    
        // Проверяем, что теги представлены в виде массива, иначе преобразуем их из строки JSON
        $tags = is_array($request->tags) ? $request->tags : json_decode($request->tags, true);
    
        // Обновляем только необходимые поля
        $subscriber->name = $request->name;
        $subscriber->email = $request->email;
        $subscriber->tags = $tags;
    
        // Сохраняем изменения
        $subscriber->save();
    
        // Перенаправляем пользователя после успешного обновления
        return redirect()->route('subscribers.index')->with('success', 'Subscriber updated successfully.');
    }
    

    
    
    
    

    
    
    

    





    public function destroy($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->delete();

        return redirect()->route('subscribers.index')->with('success', 'Subscriber deleted successfully.');
    }
}
