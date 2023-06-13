<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        // Implemente o código para buscar e retornar todas as mensagens
        $messages = Message::all();
        return response()->json($messages);
    }

    public function store(Request $request)
    {
        // Implemente o código para criar uma nova mensagem com base nos dados recebidos na solicitação
        $message = new Message;
        $message->content = $request->input('content');
        $message->save();

        return response()->json([
            'message' => 'Nova mensagem criada com sucesso',
            'data' => $message
        ]);
    }

    public function show($id)
    {
        // Implemente o código para buscar e retornar uma mensagem específica com base no ID fornecido
        $message = Message::find($id);

        if (!$message) {
            return response()->json(['message' => 'Mensagem não encontrada'], 404);
        }

        return response()->json($message);
    }

    public function update(Request $request, $id)
    {
        // Implemente o código para atualizar uma mensagem específica com base no ID fornecido e nos dados recebidos na solicitação
        $message = Message::find($id);

        if (!$message) {
            return response()->json(['message' => 'Mensagem não encontrada'], 404);
        }

        $message->content = $request->input('content');
        $message->save();

        return response()->json([
            'message' => 'Mensagem atualizada com sucesso',
            'data' => $message
        ]);
    }

    public function destroy($id)
    {
        // Implemente o código para excluir uma mensagem específica com base no ID fornecido
        $message = Message::find($id);

        if (!$message) {
            return response()->json(['message' => 'Mensagem não encontrada'], 404);
        }

        $message->delete();

        return response()->json(['message' => 'Mensagem excluída com sucesso']);
    }
}
