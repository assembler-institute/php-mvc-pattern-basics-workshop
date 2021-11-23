● What is an architecture pattern?
An architectural pattern is a general, reusable solution to a commonly occurring problem in software architecture within a given context. The architectural patterns address various issues in software engineering, such as computer hardware performance limitations, high availability and minimization of a business risk.

● What is the MVC pattern?
MVC is a software design pattern built around the interconnection of three main component types: Model, View, and Controller, often with a strong focus on Object-Oriented Programming (OOP) software paradigms. MVC
is a framework for building web applications using an MVC Design.

● Draw a scheme where you understand that the MVC pattern is clearly
Car driving mechanism is example of the MVC model.
Every car consist of three main parts.
View= User interface : (Gear lever, panels, steering wheel, brake, etc.)
Controller- Mechanism (Engine)
Model- Storage (Petrol or Diesel tank)
Car runs from engine take fuel from storage, but it runs only using mentioned user interface devices.

● Explain in which cases you would use this pattern
When I want to divide the related program logic into three interconnected elements, model, view and controller.

● Describe step by step what happens in this pattern from when you create a Request until a Response is returned (you can give more than one example if you consider it necessary).
All application navigation will be carried out from the same file ("index.php").
This file, named main controller, must control the parameters received by GET that will indicate which controller you want to include in a dynamic way.
Once this request is received, and the corresponding controller is already included in the "index.php", then the controller must carry out the necessary operations with the model and finally include the corresponding view.
In this way, each time "index.php" is called, it must repeat the process to decide which controller the user is accessing and therefore which controller to include so that it can perform the rest of the operations.

● What advantages do you think this pattern has to use?

1. Faster Development Process:
2. Ability To Provide Multiple Views:
3. Support For Asynchronous Technique:
4. The Modification Does Not Affect The Entire Model:
5. MVC Model Returns The Data Without Formatting:
6. SEO Friendly Development Platform:
