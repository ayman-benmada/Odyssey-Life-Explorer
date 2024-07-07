<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use OpenAI\Exceptions\ErrorException;
use OpenAI\Laravel\Facades\OpenAI;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class OpenAiController
{
    public function show(): View
    {
        return view('openai/show');
    }

    public function sendMessage(Request $request): JsonResponse
    {
        $message = strip_tags($request->get('message')); // @phpstan-ignore-line

        if (empty($message)) {
            return new JsonResponse(['message' => 'ko', 'success' => false]);
        }

        try {
            $result = OpenAI::chat()->create([
                'model' => config('openai.model'),
                'messages' => [
                    ['role' => 'user', 'content' => $message],
                ],
            ]);
        } catch (ErrorException $e) {
            return new JsonResponse(['message' => $e->getMessage(), 'success' => false]);
        }

        return new JsonResponse(['result' => $result, 'success' => true]);
    }
}
