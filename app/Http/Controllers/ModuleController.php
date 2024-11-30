<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;


/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="API Psikologi Mandiri",
 *      description="Dokumentasi API untuk aplikasi psikologi mandiri",
 * )
 * 
 * @OA\Server(
 *      url="/api",
 *      description="API Server"
 * )
 */
class ModuleController extends Controller
{
    /**
     * @OA\Get(
     *      path="/modules",
     *      operationId="getModulesList",
     *      tags={"Modules"},
     *      summary="Dapatkan daftar modul",
     *      description="Mengembalikan daftar modul yang tersedia",
     *      @OA\Response(
     *          response=200,
     *          description="Sukses",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/Module")
     *          )
     *      )
     * )
     */
    public function index()
    {
        return response()->json(Module::all(), 200);
    }

    public function show($id)
    {
        $module = Module::find($id);
        if (!$module) {
            return response()->json(['message' => 'Module not found'], 404);
        }
        return response()->json($module, 200);
    }

    public function store(StoreModuleRequest $request)
    {
        $module = Module::create($request->validated());
        return response()->json($module, 201);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $module = Module::create($validated);
        return response()->json($module, 201);
    }

    public function update(Request $request, $id)
    {
        $module = Module::find($id);
        if (!$module) {
            return response()->json(['message' => 'Module not found'], 404);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $module->update($validated);
        return response()->json($module, 200);
    }

    public function destroy($id)
    {
        $module = Module::find($id);
        if (!$module) {
            return response()->json(['message' => 'Module not found'], 404);
        }

        $module->delete();
        return response()->json(['message' => 'Module deleted'], 200);
    }
}
