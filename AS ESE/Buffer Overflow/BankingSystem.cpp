#include <iostream>
#include <cstring>

using namespace std;

void transferMoney(double *balance, double amount) {
    if (amount > 0 && *balance >= amount) {
        *balance -= amount;
        cout << "Transfer successful!" << endl;
    } else {
        cout << "Insufficient funds!" << endl;
    }
}

int main() {
    double balance = 1000.0;
    char buffer[10]; // Vulnerable buffer

    cout << "Welcome to the banking system!" << endl;

    cout << "Enter the amount to transfer: ";
    cin >> buffer;

    // Convert input to double
    double amount = atof(buffer);

    // Transfer money
    transferMoney(&balance, amount);

    cout << "Current balance: $" << balance << endl;

    return 0;
}
