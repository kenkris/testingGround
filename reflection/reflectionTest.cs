public class ReflectionTest{

    /**
    * Takes a data structure and set its fields on
    * another class based on the property string.
    * Ex. "Customer.Id" will first find the customer field
    * and intantiate the class then find the id field and
    * set the value on it.
    */
    public SomeClass CovertOtherClassToSomeClass(List<someData> fields)
    {
        var result = new SomeClass();

        foreach (var field in fields)
        {
            if (field.SomeProperty.IsNullOrWhiteSpace())
                continue;

            var properties = field.SomeProperty.Split('.');

            object tmp = result;

            foreach (var property in properties)
            {
                var currentType = tmp.GetType();
                var currentProperty = currentType.GetProperty(property);

                if (currentProperty == null) continue;

                if (currentProperty.PropertyType.IsClass) // initate property class and go to next property
                {
                    var tmpClass = Activator.CreateInstance(currentProperty.PropertyType);
                    currentProperty.SetValue(tmp, tmpClass);
                    tmp = currentProperty.GetValue(tmp);
                    continue;
                }

                // Set value
                currentProperty.SetValue(tmp, field.Value);
            }
        }
        return result;
    }

}
