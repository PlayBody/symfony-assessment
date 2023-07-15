<h1>Here's the documentation to pass the assessment.</h1>

<h2>Assessment description</h2>

ONE AND ONLY TASK

- you will use the MVC framework that we use: Symfony
- you will deliver solution in form of a Github repository.
- create 2 models/classes - Circle and Triangle
- implement 2 methods:

1. calculate surface

2. calculate diameter

create routes:
```javascript
    [GET] /triangle/{a}/{b}/{c}
    [GET] /circle/{radius}
```
routes must return JSON with serialized objects and calculated surfaces and diameters. For example:
```json
{
    "type": "circle",
    "radius": 2.0,
    "surface": 12.56,
    "circumference": 12.56,
}
```
or
```json
{
    "type": "triangle",
    "a": 3.0,
    "b": 4.0,
    "c": 5.0,
    "surface": 6.0,
    "circumference": 12.0,
}
```
- create service/or similar structure for the given framework (for example app.geometry_calculator)
- implement method for sum of areas for two given objects
- implement method for sum of diameters for two given objects
- please return us your solution in one week

<h1>My Solution</h1>

<h2>How to run</h2>

- Install Composer.
- Install Symfony 6.3.1.
- Install PHP 8.2.4. 
- `git clone 'this repository'`
- Navigate to the root directory of your Symfony project and run the following command:
```powershell
    composer install
    symfony server:start. 
```
- This command starts the Symfony development server.
- After running the command, the server will start and your Symfony application will be accessible at http://localhost:8000. 
- This URL can be accessed using a web browser to view your application.

<h2>Updated Documentation (Code)</h2>

<h3>Model</h3>

Shape.php: (abstract)
- This is an abstract class that serves as the base class for different shapes.
- It has a private property `$type` to store the type of the shape.
- The constructor initializes the type.
- The class defines abstract methods `isValid`, `_calculateSurface_`, `_calculateCircumference_`, and `_basicParams_` that must be implemented by subclasses.
- The `basicParams` method returns an array of basic parameters, and if the shape is invalid, it includes an \"invalid\" key with the parameters.
- The `calculateSurface` method calculates and returns the surface area of the shape.
- The `calculateCircumference` method calculates and returns the circumference of the shape.
- The `getType` method returns the type of the shape.
- The `calculate` method calculates and returns an array of information about the shape, including its type, basic parameters, surface area, and circumference.

Circle.php: (extends Shape)
- This class represents a circle shape and extends the abstract `Shape` class.
- It has a private property `$radius` to store the radius of the circle.
- The constructor initializes the `Shape` parent class with the type \"circle\" and sets the radius.
- The `isValid` method checks if the radius is greater than zero.
- The `getRadius` method returns the radius of the circle.
- The `_basicParams_` method returns an array with the radius parameter.
- The `_calculateSurface_` method calculates and returns the surface area of the circle using the formula πr^2.
- The `_calculateCircumference_` method calculates and returns the circumference of the circle using the formula 2πr.

Triangle.php: (extends Shape)
- This class represents a triangle shape and extends the abstract `Shape` class.
- It has private properties `$a`, `$b`, and `$c` to store the lengths of the triangle's sides.
- The constructor initializes the `Shape` parent class with the type \"triangle\" and sets the side lengths.
- The `isValid` method checks if the side lengths are greater than zero and if the triangle satisfies the triangle inequality theorem.
- The `getA`, `getB`, and `getC` methods return the lengths of the triangle's sides.
- The `_basicParams_` method returns an array with the side length parameters.
- The `_calculateSurface_` method calculates and returns the surface area of the triangle using Heron's formula.
- The `_calculateCircumference_` method calculates and returns the circumference of the triangle by summing the lengths of its sides.

<h3>Service</h3>

ValidateService.php:
- This service provides validation methods for geometry values.
- The `tryValidGeometryValues` method takes any number of values and checks if they are numeric and positive, throwing an exception if not. It returns an array of the validated values.

GeometryService.php:
- This service provides methods for calculating the sum of surface areas and circumferences of shapes.
- The `sumSurface` method takes an array of `Shape` objects and returns the sum of their surface areas.
- The `sumCircumference` method takes an array of `Shape` objects and returns the sum of their circumferences.

<h3>Controller</h3>

GeometryController.php:
- This controller handles the geometry-related routes.
- The `circle` method is mapped to the `/circle/{radius}` route. It accepts a float parameter `radius` and creates a new `Circle` object with the given radius. It then returns the calculated values of the circle as a JSON response.
- The `triangle` method is mapped to the `/triangle/{a}/{b}/{c}` route. It accepts three float parameters `a`, `b`, and `c` representing the sides of a triangle. It creates a new `Triangle` object with the given side lengths and returns the calculated values of the triangle as a JSON response.
- The `notFoundAction` method is mapped to any other route that is not defined. It returns a response with a \"Route Not Found\" message.
