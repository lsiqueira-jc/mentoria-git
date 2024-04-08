<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\SignatureInvalidException;
use Firebase\JWT\Key;

class JWTToken
{

    public function handle($request, Closure $next)
    {


        if(!$request->hasHeader('Authorization')||$request->header('Authorization') == null){
            return response()->json([
                'message' => 'Authorization Header não encontrado'
            ], 401);
        }

            // Separando a String do token
            list($token) = sscanf( $request->header('Authorization'), 'Bearer %s');


        try {
            $decoded = JWT::decode($token, new Key(env('JWT_KEY'), 'HS256'));

        }catch (SignatureInvalidException $e){
            // Signature verification failed'
            return response()->json([
                'message' => 'Não foi possível validar o Token de Acesso.'
            ], 401);
        }catch (ExpiredException $e){
            // Expired token
            return response()->json([
                'message' => 'Token de Acesso expirado.'
            ], 401);
        }
        catch(\UnexpectedValueException $e) {
            return response()->json([
                'message' => 'Token de Acesso inválido.'
            ], 401);
        }
        catch(\Exception $e) {
            return response()->json([
                'message' => 'Token de Acesso inválido.'
            ], 401);
        }


        // $request->merge([]);



        return $next($request);
    }
}
