/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package restconsumer;
import java.io.BufferedReader;
import java.io.DataOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.UnsupportedEncodingException;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLEncoder;
import java.util.Scanner;
import javax.net.ssl.HttpsURLConnection;
 
 
public class RestConsumer 
{
    public static void main(String[] args) throws IOException 
    {
        Scanner reader = new Scanner(System.in);
        System.out.println("Ingrese opción: 1=R , 2=C , 3=U , 4=D");
        //get user input for a
        int a=reader.nextInt();
        switch(a){
            case 1: Read();
                break;
            case 2: Create();
                break;
            case 3: Update();
                break;
            case 4: Del();
                break;
            default: break;
        }
    }
    
    public static void Del(){
        try{
            Scanner reader = new Scanner(System.in);
            System.out.println("Ingrese id del libro que desea eliminar:");
            //get user input for a
            int d=reader.nextInt();
            URL url = new URL("http://localhost/rest/index.php/del/" + d);
            HttpURLConnection conn = (HttpURLConnection) url.openConnection();

            if (conn.getResponseCode() != 200) 
            {
                throw new RuntimeException("Failed : HTTP error code : " + conn.getResponseCode());
            }

            conn.disconnect();
        } catch (MalformedURLException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }   

    public static void Read(){
        try
                {
                    URL url = new URL("http://localhost/rest/index.php");
                    HttpURLConnection conn = (HttpURLConnection) url.openConnection();
                    conn.setRequestMethod("GET");
                    conn.setRequestProperty("Accept", "application/xml");

                    if (conn.getResponseCode() != 200) 
                    {
                        throw new RuntimeException("Failed : HTTP error code : " + conn.getResponseCode());
                    }

                    BufferedReader br = new BufferedReader(new InputStreamReader((conn.getInputStream())));
                    for(int i = 0; i<100;i++){
                        String apiOutput = br.readLine();
                        if(apiOutput != null)System.out.println(apiOutput);

                    }

                    conn.disconnect();



                } catch (MalformedURLException e) {
                    e.printStackTrace();
                } catch (IOException e) {
                    e.printStackTrace();
                }

    }
    
    public static void Create() throws MalformedURLException, IOException {
        
        Scanner reader = new Scanner(System.in);
        String url = "http://localhost/rest/index.php/nuevo";
        URL obj = new URL(url);
        HttpURLConnection con = (HttpURLConnection) obj.openConnection();

        //add reuqest header
        con.setRequestMethod("POST");
        con.setRequestProperty("Accept-Language", "en-US,en;q=0.5");

        System.out.println("Ingrese titulo del libro que desea agregar:");
        String titulo = reader.next();
        System.out.println("Ingrese autor del libro que desea agregar:");
        String autor = reader.next();
        System.out.println("Ingrese isbn del libro que desea agregar:");
        String isb = reader.next();
        
        String urlParameters = "titulo=" + titulo + "&autor=" + autor + "&isbn=" + isb;

        // Send post request
        con.setDoOutput(true);
        DataOutputStream wr = new DataOutputStream(con.getOutputStream());
        wr.writeBytes(urlParameters);
        wr.flush();
        wr.close();

        int responseCode = con.getResponseCode();
        System.out.println("\nSending 'POST' request to URL : " + url);
        System.out.println("Post parameters : " + urlParameters);
        System.out.println("Response Code : " + responseCode);

        BufferedReader in = new BufferedReader(
                new InputStreamReader(con.getInputStream()));
        String inputLine;
        StringBuffer response = new StringBuffer();

        while ((inputLine = in.readLine()) != null) {
                response.append(inputLine);
        }
        in.close();

        //print result
        System.out.println(response.toString());

        
    }
    
    public static void Update() throws MalformedURLException, IOException{
        
        Scanner reader = new Scanner(System.in);
        System.out.println("Ingrese id del libro que desea actualizar:");
        //get user input for a
        int id=reader.nextInt();
        URL obj = new URL("http://localhost/rest/index.php/editar/" + id);
        HttpURLConnection con = (HttpURLConnection) obj.openConnection();

        //add reuqest header
        con.setRequestMethod("POST");
        con.setRequestProperty("Accept-Language", "en-US,en;q=0.5");
        
        System.out.println("Ingrese titulo del libro que desea actualizar:");
        String titulo = reader.next();
        System.out.println("Ingrese autor del libro que desea actualizar:");
        String autor = reader.next();
        System.out.println("Ingrese isbn del libro que desea actualizar:");
        String isb = reader.next();
        
        String urlParameters = "titulo=" + titulo + "&autor=" + autor + "&isbn=" + isb;

        // Send post request
        con.setDoOutput(true);
        DataOutputStream wr = new DataOutputStream(con.getOutputStream());
        wr.writeBytes(urlParameters);
        wr.flush();
        wr.close();

        int responseCode = con.getResponseCode();
        System.out.println("\nSending 'POST' request to URL : " + obj);
        System.out.println("Post parameters : " + urlParameters);
        System.out.println("Response Code : " + responseCode);

        BufferedReader in = new BufferedReader(
                new InputStreamReader(con.getInputStream()));
        String inputLine;
        StringBuffer response = new StringBuffer();

        while ((inputLine = in.readLine()) != null) {
                response.append(inputLine);
        }
        in.close();

        //print result
        System.out.println(response.toString());
    }
 
}