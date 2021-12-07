import java.util.Scanner;
class table{

    public static void main(String args[]){
        Scanner s = new Scanner(System.in);
        System.out.println("ENTER THE VALUE OF n WHOSE TABLE YOU WANT TO PRINT\n");
        int n = s.nextInt();  
        for(int i=1;i<=10;i++){
            System.out.println(n+" X "+i+" = "+n*i+ "\n");
        }
    }
}