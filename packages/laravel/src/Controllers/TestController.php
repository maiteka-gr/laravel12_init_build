<?php

namespace Laravel\Controllers;

use Laravel\Services\TestService;
use Laravel\Requests\TestRequest;
use Laravel\Helpers\ResponseHelper;

/**
 * TestController handles all test-related API operations.
 * Provides CRUD operations for test resources.
 *
 * @author maiteka-gr
 * @date 2024-02-25
 */
class TestController extends Controller{
    protected $testService;

    /**
     * Create a new TestController instance.
     *
     * @param TestService $testService
     */
    public function __construct( TestService $testService ) {
        $this->testService = $testService;
    }

    /**
     * Display a listing of all tests.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() {
        $data = $this->testService->getAll();

        return ResponseHelper::success( $data, 'Tests retrieved successfully' );
    }

    /**
     * Display the specified test.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show( $id ) {
        $data = $this->testService->getById( $id );

        return ResponseHelper::success( $data, 'Test retrieved successfully' );
    }

    /**
     * Store a newly created test in storage.
     *
     * @param TestRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( TestRequest $request ) {
        $data = $this->testService->create( $request->validated() );

        return ResponseHelper::success( $data, 'Test created successfully', 201 );
    }

    /**
     * Update the specified test in storage.
     *
     * @param TestRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( TestRequest $request, $id ) {
        $data = $this->testService->update( $id, $request->validated() );

        return ResponseHelper::success( $data, 'Test updated successfully' );
    }

    /**
     * Remove the specified test from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy( $id ) {
        $this->testService->delete( $id );

        return ResponseHelper::success( null, 'Test deleted successfully' );
    }
}
