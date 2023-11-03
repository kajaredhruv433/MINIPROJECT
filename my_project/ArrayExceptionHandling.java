import java.util.Scanner;

public class ArrayExceptionHandling {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        try {
            System.out.print("Enter the size of the array: ");
            int size = scanner.nextInt();

            if (size <= 0) {
                throw new IllegalArgumentException("Array size must be greater than 0.");
            }

            int[] arr = new int[size];

            System.out.println("Enter " + size + " elements:");

            for (int i = 0; i < size; i++) {
                arr[i] = scanner.nextInt();
            }

            System.out.println("Entered array elements:");

            for (int i = 0; i < size; i++) {
                System.out.println("Element at index " + i + ": " + arr[i]);
            }
        } catch (IllegalArgumentException e) {
            System.err.println("Invalid array size: " + e.getMessage());
        } catch (java.util.InputMismatchException e) {
            System.err.println("Invalid input. Please enter integers.");
        } catch (Exception e) {
            System.err.println("An error occurred: " + e.getMessage());
        } finally {
            scanner.close();
        }
    }
}
