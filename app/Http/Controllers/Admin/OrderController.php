<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderStep;
use App\Models\ImportantInfo;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // API endpoint for React
    public function apiIndex()
    {
        return response()->json([
            'steps' => OrderStep::orderBy('step')->get(),
            'importantInfos' => ImportantInfo::all(),
        ]);
    }

    // Admin CRUD (simplified)
      /** ===========================
     *  Order Steps CRUD
     *  =========================== */
    public function index()
    {
        $steps = OrderStep::all();
        $infos = ImportantInfo::all();
        return view('admin.orders.index', [
        'orderSteps' => OrderStep::all(),
        'importantInfos' => ImportantInfo::all(),
    ]);
    }

    public function createStep()
    {
        return view('admin.orders.steps.create');
    }

    public function storeStep(Request $request)
    {
        $request->validate([
            'step' => 'required',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        OrderStep::create($request->all());

        return redirect()->route('admin.order-steps.index')->with('success', 'Order step added successfully.');
    }

    public function editStep(OrderStep $order_step)
    {
        return view('admin.orders.steps.edit', compact('order_step'));
    }

    public function updateStep(Request $request, OrderStep $order_step)
    {
        $request->validate([
            'step' => 'required',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $order_step->update($request->all());

        return redirect()->route('admin.order-steps.index')->with('success', 'Order step updated successfully.');
    }

    public function destroyStep(OrderStep $order_step)
    {
        $order_step->delete();
        return redirect()->route('admin.order-steps.index')->with('success', 'Order step deleted successfully.');
    }


    /** ===========================
     *  Important Infos CRUD
     *  =========================== */
    public function createInfo()
    {
        return view('admin.orders.infos.create');
    }

    public function storeInfo(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'list_items' => 'nullable|array',
        ]);

        ImportantInfo::create([
            'title' => $request->title,
            'list_items' => $request->list_items,
        ]);

        return redirect()->route('admin.important-infos.index')->with('success', 'Important info added successfully.');
    }

    public function editInfo(ImportantInfo $important_info)
    {
        return view('admin.orders.infos.edit', compact('important_info'));
    }

    public function updateInfo(Request $request, ImportantInfo $important_info)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'list_items' => 'nullable|array',
        ]);

        $important_info->update([
            'title' => $request->title,
            'list_items' => $request->list_items,
        ]);

        return redirect()->route('admin.important-infos.index')->with('success', 'Important info updated successfully.');
    }

    public function destroyInfo(ImportantInfo $important_info)
    {
        $important_info->delete();
        return redirect()->route('admin.important-infos.index')->with('success', 'Important info deleted successfully.');
    }
}

