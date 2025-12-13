# Package Structure

**Author:** maiteka-gr  
**Created:** 2024-02-25  
**Last Updated:** 2025-12-12

This package follows myself architecture.

## Folder Structure

### 📁 Controllers
- **Purpose**: Handle HTTP requests and responses
- **Files**: 
  - `Controller.php` - Base controller class
  - `TestController.php` - Example CRUD controller
- **Usage**: Route handling, request delegation to services

### 📁 Requests
- **Purpose**: Handle form validation and input sanitization
- **Files**:
  - `BaseRequest.php` - Base request with common validation logic
  - `TestRequest.php` - Specific validation for Test model
- **Features**: Custom error messages, automatic JSON error responses

### 📁 Services
- **Purpose**: Business logic layer
- **Files**:
  - `BaseService.php` - Common service operations
  - `TestService.php` - Test-specific business logic
- **Usage**: Process data, implement business rules

### 📁 Repositories
- **Purpose**: Data access layer (Database operations)
- **Files**:
  - `BaseRepository.php` - Common CRUD operations
  - `TestRepository.php` - Test model data access
- **Pattern**: Repository pattern for database abstraction

### 📁 Models
- **Purpose**: Database models and relationships
- **Files**:
  - `BaseModel.php` - Base model with SoftDeletes
  - `Test.php` - Test model
- **Features**: Eloquent ORM, soft deletes

### 📁 Rules
- **Purpose**: Custom validation rules
- **Files**:
  - `BaseRule.php` - Abstract base for custom rules
  - `CustomNameRule.php` - Example custom validation
- **Usage**: Complex validation logic, reusable rules

### 📁 Helpers
- **Purpose**: Utility functions and common operations
- **Files**:
  - `ResponseHelper.php` - Standardized API responses
- **Usage**: JSON response formatting, common utilities

### 📁 Routers
- **Purpose**: API route definitions
- **Files**:
  - `api.php` - API routes configuration
- **Usage**: Define endpoints and route groups

### 📁 Providers
- **Purpose**: Service providers for dependency injection
- **Files**:
  - `RouteServiceProvider.php` - Route registration
- **Usage**: Register services, bind interfaces

## Architecture Flow

```
Request → Controller → Service → Repository → Model → Database
                ↓
            Response ← Helper ← Service ← Repository
```

## Usage Example

```php
// API Endpoint: PUT api/tests/1
// Request: {"name": "ss", "description": "test"}
// Flow: TestController → TestRequest (validation) → TestService → TestRepository → Test Model
// Response: JSON with validation errors or success data
```
