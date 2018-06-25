public class FileStuff
{
    public void ReadFileIntoVar()
    {
        // Path = c:\rawjson.json
        using (var r = new StreamReader("/rawjson.json"))
        {
            userData = r.ReadToEnd();
        }
    }
}
