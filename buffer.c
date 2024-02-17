#include <stdio.h>
#include <string.h>

int main(void)
{
    char buffer[10];

    printf("Give me data plz: \n");
    gets(buffer);

     printf("%s", buffer);
    
    return 0;
}

// gets is vulnerable to buffer overflow

// gets doesn't bound the user input so when i give the input "abcdefghijklmnop".

// here i pass the 16 character input. but it allocates 10 character memory buffer so the program crashes due to overflow of input in instruction pointer and returns segmentation fault.

